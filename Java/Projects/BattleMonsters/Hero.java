import java.util.Random;
import java.util.Scanner;
import java.util.InputMismatchException;

class Hero {
	private String name;
	private double health = 100;
    private int arrows = 12;
    private boolean isAlive = true;
    private boolean shield = false;
    private int healthPotion = 5;
  
    public Hero(String name){
      this.name = name;
    }
  
    public void showName(){
      System.out.println(name);
    }
  
  	public boolean isAlive(){
      return isAlive;
    }
  
  	/*
    potion()
    Determines if there is potions remaning and adds 10
    to health if potions are available
    */
  	public void potion(){
      if(healthPotion > 0){
        healthGained(10);
        healthPotion--;
      }else{
        	System.out.println("You are out potions");
			}
    }
  
 	 /*
     sword() 
     This method returns a random in when called. 
 	 */
  	public int sword(){
      Random rand = new Random();
      System.out.println("You attack with your sword!");
      int hit = rand.nextInt(15) + 5;
      return hit;
    }
  
  	 /*
     arrow() 
     This method returns a random in when called but only if arrows are remaining.
     If no remaning arrows, then zero is returned and the player lost a turn
 	 */
    public int bow(){
      Random rand = new Random();
      if(arrows > 0){
        System.out.println("You release an arrow!");
        arrows--;
        return rand.nextInt(20) + 5;
      }else{
        System.out.println("You have no arrows left and lost a turn.");
        return 0;
      }
    }
  
     /*
     shield() 
     This method is used to a flag to that is used to determine
     if less health should be taken out.
 	 */
  	public void shield(){
      shield = true;
      System.out.println("You raised your shield.");
    }
  
     /*
     attackMenu() 
     This method displays options for the user to determine what there next move
     will be during battle.
 	 */
  	public int attackMenu(){
		Scanner keyboard = new Scanner(System.in);
      	int option = 0;
      
      	System.out.println("Select and option: 1)Sword 2)Bow 3)Shield 4)Potion");
      
      	try{
          
          option = keyboard.nextInt();
          
          while(option <= 0 || option >= 5){
			System.out.println("Characters must be numeric and range from 1-4. Try again");
            System.out.println("Select and option: 1)Sword 2)Bow 3)Shield 4)Potion");
            option = keyboard.nextInt();
          }
          
        }catch(InputMismatchException ex){
          System.out.println("Characters must be numeric and range from 1-4. Try again");
          System.out.println("Select and option: 1)Sword 2)Bow 3)Shield 4)Potion");
          option = keyboard.nextInt();
        }
			
       
      switch(option){
        case 1:
          return sword();
        case 2: 
          return bow();
        case 3:
          shield();
          return 0;
        case 4:
          potion();
          return 0; 
        default:{
          System.out.println("Not a valid selection");
          return 0;
        }
      }
    }
  
     /*
     healthLost() 
	   This method takes and int as an argument and sets the health to
     a new value. It also checks to see if shield is being used, which will
     mean %50 less health will be take out. If health is zero or below after a hit
     is taken, then isAlive is set to false.
 	 */
  	public void healthLost(int hit){
      if(shield && health > 0){
        System.out.println("Your gaurd was successful; you only lost " + hit/2 + " points.");
        health -= hit/2;
      }else{
        health -= hit;
		}
      
      if(health <= 0){
        isAlive = false;
      }
    }
  
     /*
     healthGained() 
	 This takes and int as an argument and adds that value to the health attribute.
 	 */
  	public void healthGained(int gain){
      	System.out.println("Your health increased by 10!");
		health += gain;
    }
  
  	public String toString()
    {
		return "Name: " + name + " Health: " + health;
    }
  
}
