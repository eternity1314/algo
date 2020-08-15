public class emTest{
    public static void main(String[] arg)
    {
        Em em1 = new Em("a");
        em1.setAge(22);
        em1.setDescript("das");

        Em em2 = new Em("b");
        em2.setAge(22);
        em2.setDescript("das");

        em1.printEm();
        em2.printEm();
    }

    protected static class Em {
        String name;
        int age;
        String descript;

        public Em(String name)
        {
            this.name = name;
        }

        public void setAge(int age) {
            this.age = age;
        }

        public void setDescript(String descript) {
            this.descript = descript;
        }

        public void printEm() {
            System.out.println("名字:" + this.name);
            System.out.println("年龄:" + this.age);
            System.out.println("简介:" + this.descript);
        }
    }
}
