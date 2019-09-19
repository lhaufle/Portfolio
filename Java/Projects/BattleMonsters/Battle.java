import java.util.*;

class Battle {
  
  public static void main(String[] args) {
    Scanner keyboard = new Scanner(System.in);
    int chosenMonster = 0;
    int playAgain = 0;
    
    
    //create list to hold the monsters
    ArrayList<Monster> monster = new ArrayList<Monster>();
    
    //add monster types to ArrayList
    monster.add(new MutatedTurtle());
    monster.add(new Slime());
    monster.add(new StoneSkeleton());
    
    
    /*
      START THE GAME----------------------------------------
    */
    
    //get the users name
    System.out.println("What is your name hero?");
    String name = keyboard.next();
    Hero hero = new Hero(name);
    
    do {
      
      //Game monster selection menu
    System.out.println("Choose the monster you want to battle!");
    System.out.println("--------------------------------------");
    for(int i = 0; i < monster.size(); ++i){
      System.out.println(i + ") " + monster.get(i).getName());
    }
    System.out.println("---------------------------------------");
    
    //verify that valid input was used
    try{
      chosenMonster = keyboard.nextInt();
          
          while(chosenMonster <= 0 || chosenMonster >= 5){
			System.out.println("Characters must be numeric and within range. Try again");
            System.out.println("Select and option: 1)Sword 2)Bow 3)Shield 4)Potion");
            chosenMonster = keyboard.nextInt();
          }
    }catch(InputMismatchException ex){
          System.out.println("Characters must be numeric and within range. Try again");
          System.out.println("Select and option: 1)Sword 2)Bow 3)Shield 4)Potion");
          chosenMonster = keyboard.nextInt();
    }       
    
    //assign the chosen moster to a variable for easier use
    Monster choice = monster.get(chosenMonster); 
    
    //start the battle
    
    while(hero.isAlive() && choice.isAlive()){//run the game while both ther hero and monster are alive
      System.out.println("-------------------------------------------------------------------");
      System.out.println("Monster: " + choice.toString()); //display monster info
      System.out.println("Hero: " + hero.toString()); //display hero info
      System.out.println("-------------------------------------------------------------------");
      choice.changeHealth(hero.attackMenu()); //player starts the attack
      System.out.println("-------------------------------------------------------------------");
      choice.isAlive();//check life of monster
      System.out.println("-------------------------------------------------------------------");
      System.out.println("The monster's turn");
      hero.healthLost(choice.attack()); //mosters attack
      System.out.println("-------------------------------------------------------------------");
      hero.isAlive(); //check life of hero
      
    }
    
    //check results
    if(hero.isAlive() == true && monster.size()> 0){ //hero lives and monsters remaining
      
      monster.remove(chosenMonster);//remove defeated monster
      
      //Determine if the user still wants to play
      System.out.println("You won the battle but there are " + monster.size() + "\n" +
                        " monsters remaining. Would you like to fight again. Enter 1 to \n" +
                         "continue or 2 to quit.");
      
      //verify user's input
      try {
        
        playAgain = keyboard.nextInt();
      
      	while(playAgain < 1 || playAgain > 2){
        	System.out.println("You must enter the number one or two.");
        	playAgain = keyboard.nextInt();
      	}
      
      } catch(InputMismatchException ex){
        	System.out.println("Selection must be numeric. Please enter 1 or 2");
        	playAgain = keyboard.nextInt();
      } 
    } else if(hero.isAlive() == true && monster.size() == 0){ //user lives and not monsters remain
      	//display the victory message and end the loop
		System.out.println("Victory, every monster is slain!");
        System.out.println("Final Stats: " + hero.toString());
        playAgain = 2;
    } else { //display defeat message and end the game
        System.out.println("You have died!!!!!");
      	playAgain = 2;
    }
      
    }while(playAgain != 2); //continue playing
   
  } 
}
