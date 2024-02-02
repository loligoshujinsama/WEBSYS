package com.mygdx.game;

import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;

public class Entity{
	private float x,y;
	private float speed;
	private Color color;
	
	//default constructor(called when there's no parameter)
	public Entity() 
	{
		
	}
	
	public Entity(float x, float y, Color color, float speed)
	{
		this.x = x;
		this.y = y;
		this.color = color;
		this.speed = speed;
	}
	
	public void setX(float x)
	{
		this.x = x;
	}
	
	public void setY(float y)
	{
		this.y = y;
	}
	
	public float getX()
	{
		return x;
	}
	
	public float getY()
	{
		return y;
	}
	
	public void setSpeed(float speed)
	{
		this.speed = speed;
	}
	
	public float getSpeed()
	{
		return speed;
	}
	
	public void setColor(Color color)
	{
		this.color = color;
	}
	
	public Color getColor() 
	{
		return color;
	}
	
	public void draw(ShapeRenderer shape)
	{
		
	}
	
	public void draw(SpriteBatch batch)
	{
	
	}
	
	public void movement() 
	{
		
	}
}