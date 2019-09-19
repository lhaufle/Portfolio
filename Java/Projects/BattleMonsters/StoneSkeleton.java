import java.util.Random;

class StoneSkeleton extends Monster {
	private boolean isAlive = true;
  
  	public StoneSkeleton(){
      super("Stone Skelelton", 15);
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
    int attackType = rand.nextInt(3);
    int sword = rand.nextInt(10) + 1;
    int shieldBash = rand.nextInt(20) + 5;
    int kick = rand.nextInt(5) + 1;
    
    
    switch(attackType){
      case 0:
        System.out.println("The skeleton missed!");
        return 0;
      case 1:
        System.out.println("The skeleton attacks with its rusty ancient sword.");
        return sword;
      case 2:
        System.out.println("A shield is bashed against your head.");
        return shieldBash;
      case 3:
        System.out.println("Unleashes a kick!");
        return kick;
      default:
        System.out.println("error");
        return 0;
    }
  }
  
  
  /*
   changeHealth()
   Takes an int as an argument but only reduces health by one if the int is
   one or greater. 
   It also determines if isAlive()should be set to false
 */
  @Override
  public void changeHealth(int hit){
     if(isAlive && hit == 0){
      System.out.println(getName() + " was not effected.");
    }else if(isAlive && hit > 0){
      double health = getHealth();
      health -= 1;
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
