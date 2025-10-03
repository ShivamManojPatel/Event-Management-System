import java.util.*;

class Cricketer
{
    public int id;
    public String name, specialization;
    public int match1, match2, match3, match4, match5;
    public int strick;

    public void getdata(int id, String name, String specialization, int match1, int match2, int match3, int match4, int match5)
    {
        this.id = id;
        this.name = name;
        this.specialization = specialization;
        this.match1 = match1;
        this.match2 = match2;
        this.match3 = match3;
        this.match4 = match4;
        this.match5 = match5;
    }

    public void display()
    {
        System.out.println("Id :" + id);
        System.out.println("Name :" + name);
        System.out.println("Specialization :" + specialization);
    }

    public int cal_Strick()
    {
        int total = match1 + match2 + match3 + match4 + match5;
        strick = total * 100 / 500;

        return strick;
    }

    public String cat()
    {
        if(strick >= 90)
        {
            return "Platinum";
        }
        else if(strick >= 70 || strick < 90)
        {
            return "Gold";
        }
        else if(strick > 60 || strick < 70)
        {
            return "Silver";
        }

        return "";
    }

}

public class Strick_rate {
    public static void main(String[] args)
    {
        Scanner sc = new Scanner(System.in);

        System.out.println("Enter Player Id: ");
        int id = sc.nextInt();

        System.out.println("Enter Player Name: ");
        String name = sc.nextLine();

        System.out.println("Enter Player Specialization: ");
        String spec = sc.nextLine();

        System.out.println("Enter player match 1 score: ");
        int sc1 = sc.nextInt();

        System.out.println("Enter player match 2 score: ");
        int sc2 = sc.nextInt();

        System.out.println("Enter player match 3 score: ");
        int sc3 = sc.nextInt();

        System.out.println("Enter player match 4 score: ");
        int sc4 = sc.nextInt();

        System.out.println("Enter player match 5 score: ");
        int sc5 = sc.nextInt();

        Cricketer c = new Cricketer();
        c.getdata(id, name, spec, sc1, sc2, sc3, sc4, sc5);
        c.display();
        System.out.println("Player Strick rate: " + c.cal_Strick());
        System.out.println("Player Category: " + c.cat());

        sc.close();
    }
}