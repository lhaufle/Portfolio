import java.util.Random;

class Hero {
    private String name;
    private double health = 100;
    private int arrows = 4; //only four arrows to use
    private boolean shield = false; //user by default is not holding up the shield
    private boolean isDead  = false; //user starts alive of course
  
  	
    public Hero(String name){
		this.name = name;
    }
  
  	//show the hero's health
    public void showHealth(){
      System.out.println("Health:" + health);
    }
   
    //show the hero's name
    public void showName(){
      System.out.println("Name:" + name);
    }
  	
  	//return status of life
    public boolean status(){
		return isDead;
    }
  
    /***
    useShield()
    This method is used to reduce the health taken by the user by 50% when set to true 
    ***/
    public void useShield(){
      System.out.println("You raised your shield for defense");
      shield = true; //user decides to defend
    }
  
    /***
    useSword()
    A random number is generated that will be used to return an attack value.
    shield will be set to false when user decides to attack. 
    ***/
  	public int useSword(){      
        shield = false; // user not defending when attacking    
      
		Random rand = new Random();     
      
      	int hit = rand.nextInt(10); //get random hit value   
      
      	if(hit == 0){ //let user know they missed if returned value is 0.
          System.out.println("You missed");
          return 0;
        }else{ //return damage amount and display the damange amount
          System.out.println("Damage dealt with sword: " + hit);
          return hit;
        } 
    }
  
    /***
    useArrow()
    A random number is generated that will be used to return an attack value. The attack
    only works when the user has arrows to use. Arrows will be reduced after each use.
    If the user has not arrows a turn will be wasted and a value of 0 will be returned. 
    shield will be set to false when user decides to attack. 
    ***/
 	public int useArrow(){
      
      if(arrows == 0){ //check if the user has arrows to use
        System.out.println("You have no more arrows and lost a turn while reaching for air!");
        return 0;
      }else{
       shield = false; 
       Random rand = new Random();
       int hit = rand.nextInt(20)+ 10; //generate a random number between 10 and 20
       arrows--; //decrease arrows by one
       System.out.println("Damage dealt with arrow: " + hit);
       System.out.println("You have " + arrows + " Remaining");
       return hit + 5;
      } 
    }
  
    /***
    healthLost()
    Takes an int as an argument and reduces health by int. If shield is used, then then
    health lost will be reduced by 50 percent. Health is checked to verify that it is still greater
    than 0. If not, then a message is displayed letting the user know they are dead and the boolean
    variable isDead is set to true. 
    ***/
  	public void healthLost(int hit){

      
      if(shield && hit > 0){ //reduce points taken by half if shield raised
        System.out.println("Your shield reduced damage by half!");
        System.out.println("You took " + (hit/2) + " damage.");
        health -= hit / 2;
      }else if(shield == false && hit > 0){ //reduce points by hit taken.
        health -= hit;
        System.out.println("You took " + hit + " damage!");
      }else{
        System.out.println("There was no effect");
      }
      
      if(health <= 0){ //verify the user still has health.
        System.out.println("You took a hit and lost " + hit + " health!");
        System.out.println("Your dead!");
        isDead = true; 
      } 
      
    }
  
}
