package com.mygdx.game;

import com.badlogic.gdx.ApplicationAdapter;
import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.utils.ScreenUtils;
import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;
import java.util.Random;


public class GameMaster extends ApplicationAdapter {
	
	private SpriteBatch batch;
	private final int NUM_DROPS = 10;
	private Entity[] drops = new Entity[NUM_DROPS];
	private Entity bucket;
    private ShapeRenderer shape = null;
    Entity triangle;
    Entity circle;
    
    Random random = new Random();
	
	@Override
	public void create() 
	{
		batch = new SpriteBatch();
		shape = new ShapeRenderer();
		
		for (int i = 0; i < NUM_DROPS; i++) {
			int randomX = random.nextInt(Gdx.graphics.getWidth());
            int randomY = random.nextInt(Gdx.graphics.getHeight());
            int randomSpeed = random.nextInt(8) + 1;
			drops[i] = new TextureObject("droplet.png", randomX, randomY, randomSpeed);
		}
		
		bucket = new TextureObject("bucket.png",50,50,200);
		circle = new Circle(400, 100, Color.GREEN, 200);
		triangle = new Triangle(100, 100, Color.RED, 200);
	}
	
	@Override
	public void render() 
	{
		ScreenUtils.clear(0, 0, 0.2f, 1);
		
		batch.begin();	
			for (int i = 0; i < NUM_DROPS; i++) {
				drops[i].draw(batch);
				drops[i].setY(drops[i].getY() - drops[i].getSpeed());
				
				if (drops[i].getY() <= 0) 
				{
					drops[i].setY(400);
					if (drops[i].getSpeed() <= 10 && ((drops[i].getSpeed() + 2) <= 10)) {
						drops[i].setSpeed(drops[i].getSpeed() + 2);
					}
				}
			}
			bucket.draw(batch);
		batch.end();
		
		shape.begin(ShapeRenderer.ShapeType.Filled);
			circle.draw(shape);
			triangle.draw(shape);
		shape.end();
		
		circle.movement();
		triangle.movement();
		bucket.movement();
		
		
	}
	@Override
	public void dispose()
    {
        batch.dispose();
    }
}





