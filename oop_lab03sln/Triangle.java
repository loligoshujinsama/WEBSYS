package com.mygdx.game;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input.Keys;
import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;

public class Triangle extends Entity{

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
	
	@Override
	public void movement() 
	{
		if (Gdx.input.isKeyPressed(Keys.A)&& getX() >= 0) 
		{
			float x = getX() - getSpeed() * Gdx.graphics.getDeltaTime();
			setX(x);
		}
		if (Gdx.input.isKeyPressed(Keys.D)&& getX() <= 500) 
		{
			float x = getX() + getSpeed() * Gdx.graphics.getDeltaTime();
			setX(x);
		}
	}
}