import java.util.Random;

class Slime extends Monster {
  
  private boolean isAlive = true;
  
  public Slime(){
    super("Slime", 50);
  }
  
  @Override
  public boolean isAlive()
  {
    return isAlive;
  }
  
  @Override
  public int attack(){
    Random rand = new Random();
    int slimeBall = rand.nextInt(2) + 1;
    System.out.println("A small ball of slime was thrown at you....It make you feel sick!");
    return slimeBall;
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
