package com.mygdx.game;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input.Keys;
import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;

public class TextureObject extends Entity{
	
	private Texture tex;
	private boolean AIControlled;

	public void setAIControlled(boolean AIControlled) {
		this.AIControlled = AIControlled;
	}

	public boolean isAIControlled() {
		return AIControlled;
	}
	
	public TextureObject() 
	{
		
	}
	
	public TextureObject(String file, float x, float y,int speed)
	{
		super(x,y,Color.RED,speed);
		this.tex = new Texture(Gdx.files.internal(file));

	}
	
	public Texture getTexture(){
		return tex;
	}
	
	public void setTexture(Texture t){
		tex = t;
	}
	
	public void draw(SpriteBatch batch)
	{
		batch.draw(getTexture(), getX(), getY(), getTexture().getWidth(), getTexture().getHeight());
	}

    @Override
    public void moveAIControlled() {
		this.setY(this.getY() - this.getSpeed());

        if (this.getY() <= 0) {
            this.setY(400);
            if (this.getSpeed() <= 10 && ((this.getSpeed() + 2) <= 10)) {
                this.setSpeed(this.getSpeed() + 2);
            }
        }
    }

    @Override
    public void moveUserControlled() {
		if (Gdx.input.isKeyPressed(Keys.LEFT)&& getX() >= 0) 
		{
			float x = getX() - getSpeed() * Gdx.graphics.getDeltaTime();
			setX(x);
		}
		if (Gdx.input.isKeyPressed(Keys.RIGHT)&& getX() <= 500) 
		{
			float x = getX() + getSpeed() * Gdx.graphics.getDeltaTime();
			setX(x);
		}
    }
}