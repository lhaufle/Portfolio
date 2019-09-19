import java.util.Random;

public class MutatedTurtle extends Monster{
  private boolean isAlive = true;
  
  public MutatedTurtle(){
    super("Giant Mutated Turtle", 200); //The monster's name and health are set
  }
  
  @Override
  public boolean isAlive(){
    return isAlive;
  }
  
  /*
   attack()
   returns a random int using the Random object and 
   a switch statement
 */
  @Override
  public int attack(){
    Random rand = new Random();
    int attackType = rand.nextInt(3); //create random int
    int spinAttack = rand.nextInt(10) + 1;
    int snappingTurtle = rand.nextInt(20) + 5;
    int punch = rand.nextInt(3) + 1;
    
    switch(attackType){ //use random int to determine attack
      case 0:
        System.out.println("The turtle missed!");
        return 0;
      case 1:
        System.out.println("The turtle's head and legs retract into its massive spiky shell. \n" +
                          "It begins to spin rapidly on his belly and is moving your direction!");
        return spinAttack;
      case 2:
        System.out.println("This large turtle is a snapping turtle, and its ugly beak about to clamp down \n"+
                          "on you!");
        return snappingTurtle;
      case 3:
        System.out.println("The turtle smacks you with one of its legs. Not much damage, but it does hurt!");
        return punch;
      default:
        System.out.println("error");
        return 0;
    }
  }
 
  /*
   changeHealth()
   Takes an int as an argument and sets the health accordingly. 
   It also determines if isAlive()should be set to false
 */
  @Override
  public void changeHealth(int hit){
    if(isAlive && hit == 0){
      System.out.println(getName() + " was not effected.");
    }else if(isAlive && hit > 0){
      double health = getHealth();
      health -= hit;
      setHealth(health);
      System.out.println(getName() + " lost " + hit + " health.");
    }
    
    if(getHealth() <= 0){
      isAlive = false;
    }
  }
  

  public String toString(){
    return "Name: " + getName() + " Health: " + getHealth();
  }
  
  
  
}
