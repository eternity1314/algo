<?php
class HashMap
{
    // 头指针
    public $head;
    // 数组长度
    public $optimal = 10;
    // 散列表
    public $hashArray = [];
    // 跳表最大层数
    protected $levelCount = 3;

    public function __construct()
    {
        $this->head = new Node($this->levelCount);
    }

    public function set($key, $value)
    {
        $index = $this->hashCode($key);
        $level = $this->randomLevel();
        $node = new Node($level);
        $node->value = $value;
        $node->hkey = $key;

        // 操作散列表
        if (isset($this->hashArray[$index])) {
            $hashNode = $this->hashArray[$index];
            while ($hashNode->hnext) {
                if ($hashNode->hkey == $key) {
                    break;
                }
                $hashNode = $hashNode->hnext;
            }
            $hashNode->hnext = $node;

        } else {
            $this->hashArray[$index] = $node;
        }

        // 操作跳表
        $p = $this->head;
        $update = [];
        // 从跳表中查找对应的值
        for ($i = $this->levelCount - 1; $i >= 0; $i--) {
            while (isset($p->next[$i]) && $value > $p->next[$i]->value) {
                $p = $p->next[$i];
            }
            // 每一层需更新的节点
            if ($i <= $level) {
                $update[$i] = $p;
            }
        }

        // 需要更新的层数
        for ($i = 0; $i <= $level; $i++) {
            $node->next[$i] = $update[$i]->next[$i];
            $node->prev[$i] = $update[$i];
            $update[$i]->next[$i] = $node;
        }
    }

    public function del($key)
    {
    	$index = $this->hashCode($key);

    	// 删除散列表节点
    	if (!isset($this->hashArray[$index])) {
    		return ;
    	}
    	$hashNode = $this->hashArray[$index];
    	$delNode = null;
		// 第一个
		if ($hashNode->hkey == $key) {
			$this->hashArray[$index] = $hashNode->hnext;
			$delNode = $hashNode;
		} else {
			while ($hashNode->hnext) {
				if ($hashNode->hnext->hkey == $key) {
					$delNode = $hashNode->hnext;
					$hashNode->hnext = $hashNode->hnext->hnext;
					break;
				}
				$hashNode = $hashNode->hnext;
			}
		}
		// var_dump($delNode);exit;
		// 删除跳表节点
		for ($i = 0; $i <= $this->levelCount; $i++) {
			if ($delNode && isset($delNode->prev[$i]) && $delNode->prev[$i] !== null) {
				$delNode->prev[$i]->next[$i] = $delNode->next[$i];
			}
		}
    }

    public function get($key)
    {
    	$index = $this->hashCode($key);
		$hashNode = $this->hashArray[$index];

    	while ($hashNode->hnext) {
    		if ($key == $hashNode->hkey) {
    			return $hashNode;
    		}
    		$hashNode = $hashNode->hnext;
    	}

    	if ($hashNode->hkey != $key) {
    		return -1;
    	}

    	return $hashNode->value;
    }

    public function getBetweenByScore($start, $end)
    {
        $p = $this->head;
        // 跳表最小值
        $minValue = $this->head->next[0]->value;
        // 区间数组
        $data = [];
        if ($end < $minValue) {
            return $data;
        }

        if ($start > $minValue) {
            for ($i = $this->levelCount; $i >= 0; $i--) {
                while (isset($p->next[$i]) && $start > $p->next[$i]->value) {
                    $p = $p->next[$i];
                }
            }
        }
        $p = $p->next[0];

        while ($p && $end >= $p->value) {
            $data[] = "区间值：".$p->value."\n";
            $p = $p->next[0];
        }

        return $data;
    }

    public function hashPrintf()
    {
        foreach ($this->hashArray as $key=>$item) {
            $node = $this->hashArray[$key];
            $str = '';
            while ($node) {
                $str .= $node->hkey .'-'. $node->value . ' => ';
                $node = $node->hnext;
            }
            echo "hashIndex". $key. ": ". $str. "\n";
        }
    }

    public function skitPrintf()
    {
        // var_dump($this->head->next);exit;
        for ($i = 0; $i < $this->levelCount; $i++) {
        	$p = $this->head->next;
            $str = '';

            while ($p[$i]) {
                $str .= $p[$i]->hkey .'-'. $p[$i]->value . '-' . $i . '   ';
                $p = $p[$i]->next;
            }
            echo $str . "\n";
        }
    }

    public function randomLevel()
    {
        $count = 0;
        for ($i = 1; $i < $this->levelCount; $i++) {
        	if (rand(0, 100) % 2 == 0) {
        		$count++;
        	}
        }
        return $count;
    }

    protected function hashCode($key)
    {
        return $key % $this->optimal;
    }
}

class Node
{
    public $hnext;
    public $hkey;
    public $prev = [];
    public $next = [];
    public $value;

    public function __construct($level)
    {
        for ($i = 0; $i <= $level; $i++) {
            $this->next[$i] = null;
            $this->prev[$i] = null;
        }
    }
}

$hashMap = new HashMap();
//$hashMap->set(11, 1000);
$hashMap->set(21, 2000);
//$hashMap->set(12, 1000);
//$hashMap->set(13, 1000);
$hashMap->set(31, 3000);
//$hashMap->set(15, 1000);
//$hashMap->set(22, 1000);
//$hashMap->set(33, 1000);
$hashMap->del(33);
echo $hashMap->get(31);
print_r($hashMap->getBetweenByScore(2000, 3000));
//$hashMap->set(44, 1000);
//var_dump($hashMap);
$hashMap->hashPrintf();
$hashMap->skitPrintf();