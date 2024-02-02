package com.mygdx.game;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input.Keys;
import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;

public class Triangle extends Entity{

	@Override
    public void moveAIControlled() {
        // This entity doesn't move AI-controlled, so this method is empty
    }

	@Override
	public void moveUserControlled() {
		float newX = getX();
	
		if (Gdx.input.isKeyPressed(Keys.A) && newX - 50 >= 0) {
			newX -= getSpeed() * Gdx.graphics.getDeltaTime();
		}
		if (Gdx.input.isKeyPressed(Keys.D) && newX + 50 <= Gdx.graphics.getWidth()) {
			newX += getSpeed() * Gdx.graphics.getDeltaTime();
		}
	
		setX(newX);
	}

	public Triangle()
	{
		
	}
	
	public Triangle(float x, float y, Color color, float speed) 
	{
		super(x,y,color,speed);
	}
	
	@Override
	public void draw(ShapeRenderer shape) 
	{
		shape.setColor(getColor());
		shape.triangle(-50+getX(), -50+getY(), 50+getX(), -50+getY(), 0+getX(), 50+getY());
	}
}