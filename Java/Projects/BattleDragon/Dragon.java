import java.util.Random;

class Dragon {
 	private String name = "Dragon";
    private double health = 500;
    private int warmingUp = 0;
  
  	//displays health
    public void showHealth(){
      System.out.println("Dragon Health:" + health);
    }
  
  	//Displays the name
    public void showName(){
      System.out.println("Name:" + name);
    }
  
    /***
    attack()
    A random number is used to determine one of four possible attacks. 
    ***/
    public int attack(){
      Random rand = new Random();
      
      int attackType = rand.nextInt(3); //create random int
      
      int bite = rand.nextInt(10) + 5; 
      int swipe = rand.nextInt(15) + 5; 
      int tailStrike = rand.nextInt(20) + 5;  
      
      switch(attackType){ //determine attack
        case 0:
          System.out.println("It was a miss!");
          return 0;
        case 1:
          System.out.println("The dragon unleashed a bite!");
          return bite;
        case 2:
          System.out.println("The dragon swipes with hits claws!");
          return swipe;
        case 3:
          System.out.println("The dragon attacks with its massive tail!");
          return tailStrike;
        default:
          System.out.println("error");
          return 0;
      }
      
    }
  
    /***
    breathFire()
    Every three turns for the dragon will increase warm up by one. 
    If the warm up is three than a fire blast will occure that dishes out 40 damage
    ***/
  	public int breathFire(){
      warmingUp++; //increase warmup by one
      
      switch(warmingUp){ //dtermine if dragon breaths firea
        case 1:
          System.out.println("You feel the temp rising!");
        return 0;
        case 2:
          System.out.println("The heat seems to be coming from the dragons mouth...somthing is about to happen.");
        return 0;
        case 3:
          System.out.println("Dragon unleashed a pillar of fire!!!");
        return 40;
        default:
          return 0;
      }
    }
  
    //reduce health
  	public void healthLost(int health){
      this.health -= health;
    }
    
}
