package com.mygdx.game;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input.Keys;
import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;

public class Circle extends Entity{

	private float radius;

    @Override
    public void moveAIControlled() {
        // This entity doesn't move AI-controlled, so this method is empty
    }

    @Override
    public void moveUserControlled() {
		if (Gdx.input.isKeyPressed(Keys.UP)&& getY() <= 500) 
		{
			float y = getY() + getSpeed() * Gdx.graphics.getDeltaTime();
			setY(y);
		}
		if (Gdx.input.isKeyPressed(Keys.DOWN)&& getY() >= 0) 
		{
			float y = getY() - getSpeed() * Gdx.graphics.getDeltaTime();
			setY(y);
		}
    }

	public Circle()
	{
		
	}
	
	public Circle(float x, float y, Color color, float speed) 
	{
		super(x,y,color,speed);
		radius = 50;
	}
	

	public void setRadius(float radius) 
	{
		this.radius = radius;
	}
	
	public float getRadius() 
	{
		return radius;
	}
	
	@Override
	public void draw(ShapeRenderer shape) 
	{
		shape.setColor(getColor());
		shape.circle(getX(), getY(), getRadius());
	}
}