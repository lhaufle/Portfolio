/**
The Monster class was created as abstract with 
methods that must be used but can very from different monster 
subtypes. 
**/
public abstract class Monster {
	private String name;
  	private double health;
  
  	public Monster(String name, double health){
      this.name = name;
      this.health = health;
    }
  
  	public String getName(){
  		return name;
    }
  
  	public double getHealth(){
      return health;
    }
  
  	public void setHealth(double health){
      this.health = health;
    }
  
    public abstract boolean isAlive(); 
  
  	public abstract int attack();
  
  	public abstract void changeHealth(int hit);
  
  	
}
