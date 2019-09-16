import java.util.Scanner;

class Battle {
  
    /***
    intro()
    The method takes a string as an argument and prints the introduction.
    ***/
    static void intro(String name){
      
    System.out.println("-------------------------Introduction--------------------------------");
    
    System.out.println("\t Hello, " + name + ". You party has just escaped with a great \n" +
                       "\t treasure that will save tke kingdom, but a dragon suddenly drops \n" +
                      "\t in front of you! You are armed with a sword, shield, and a bow with four \n"+
                      "\t arrows. Let's be realistic, you aren't going to kill a massive fire \n" +
                      "\t breathing dragon. I know, you are thinking the hero's job is to slay \n" +
                      "\t the dragon, but that is not going to be your story. If you fight long \n" +
                      "\t enough, your friends just might live; however, you are going to \n" +
                      "\t die regardless of what you do. Don't worry, bards will sing \n" +
                      "\t of your sacrifice for a few years to come!");
    System.out.println("---------------------------------------------------------------------");
  }
  
 
  public static void main(String[] args) {
    
    Scanner keyboard = new Scanner(System.in);
    
    String name; //to hold the users name
    int turn = 1; //start rounds at 10
    int option = 0; //option used to hold user input for attack type
    
    //get the user's name
    System.out.println("Hello Hero! What is your name?");
    name = keyboard.next();
    
    //display the intro
    intro(name); 
    
    //create the characters
    Hero hero = new Hero(name);
    Dragon dragon = new Dragon();
    
    //begin the battle
    while(hero.status() == false && turn <= 10){
 
      	//present the user with a choice of attack
		System.out.println(" Choose your attack: 1)Sword 2)Bow 3)Shield");
      
      	option = keyboard.nextInt();
      
        //determine which attack is chosen and call corrisponding method
        if(option == 1){
          dragon.healthLost(hero.useSword());
        } else if(option == 2){
          dragon.healthLost(hero.useArrow());
        } else if(option == 3){
          hero.useShield();
        } else {
		  System.out.println("That is not an valid choice; you lose a turn");
          turn--;
        }
      	
      	//dragons turn to do battle
        System.out.println("The dragon's turn");
      	dragon.showHealth();
        hero.healthLost(dragon.attack());
        hero.healthLost(dragon.breathFire());
      
        System.out.println("----Summary for round " + turn + "-------");
        hero.showHealth();
        hero.status();
      
        turn++;
    }
    
    	//display message for either victory of defeat!
        if(turn < 10){
			System.out.println("Well, the kingdom is lost and everyone is dead...you failed");
        } else{
            System.out.println("####################-Victory-###################################");
            System.out.println("Congrats! Everyone is happy now--maybe not you--but \n" +
                              "your friends lived, the kingdom is saved, and even the \n" +
                              "dragon is happy. He gave you a quick sear, left a chewy inside, \n" +
                              " and is currently crunching through your bones with a smile :)");
          System.out.println("##################################################################");
        }
    
  
  }
}
