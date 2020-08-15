public class BiTree {
    Node root;
    public static void main(String[] args)
    {
        System.out.println(123);
    }

    public void search()
    {

    }

    public void insert(Integer data)
    {
        Node p = this.root;
        Node newNode = new Node(data);

        while (p != null) {
            if (data > p.data) p = p.right;
            else p = p.left;
        }


    }

    public void delete()
    {

    }

    protected static class Node
    {
        Node left;
        Node right;
        Integer data;

        public Node(Integer data)
        {
            this.data = data;
        }
    }
}