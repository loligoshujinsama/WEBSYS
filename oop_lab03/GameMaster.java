package com.mygdx.game;

import java.awt.Color;

import com.badlogic.gdx.ApplicationAdapter;
import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input.Keys;
import com.badlogic.gdx.utils.ScreenUtils;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;

public class GameMaster extends ApplicationAdapter {

    private SpriteBatch batch;
    
    // Create array of 'drop' called droplets
    private TextureObject[] droplets;
    private TextureObject bucket;

    private ShapeRenderer shape;
    private Circle circle;
    private Triangle triangle;
    
    @Override
    public void create() {
        batch = new SpriteBatch();
        // Get half of the screen to initialize in the middle
        bucket = new TextureObject("bucket.png",Gdx.graphics.getWidth()/2, 0,0);
        droplets = new TextureObject[10];
        for (int i=0; i<droplets.length; i++) {
            float x = (float) (Math.random() * Gdx.graphics.getWidth());
            float y = (float) (Math.random() * Gdx.graphics.getHeight());
            droplets[i] = new TextureObject("droplet.png",x,y,2);
        }
        
        shape = new ShapeRenderer();
        circle = new Circle(Gdx.graphics.getHeight()/2, Gdx.graphics.getWidth()/2, 8, 5);
        triangle = new Triangle(20, 20, 20,5);
    }
    
    @Override
    public void render() {
    	//400units per second
        if(Gdx.input.isKeyPressed(Keys.LEFT) && bucket.getX() > 0) bucket.setX(bucket.getX() - 400 * Gdx.graphics.getDeltaTime());
        if(Gdx.input.isKeyPressed(Keys.RIGHT) && bucket.getX() + bucket.getTexture().getWidth() < Gdx.graphics.getWidth()) bucket.setX(bucket.getX() + 400 * Gdx.graphics.getDeltaTime());
        
        ScreenUtils.clear(0,0,0.2f,1);

        shape.begin(ShapeRenderer.ShapeType.Filled);
        	circle.drawCircle(shape);
        	circle.movement();
        	triangle.drawTriangle(shape);
        	triangle.movement();
        shape.end();
        
        batch.begin();

        // lab stated to use assigned tex, instead of explicitly calling .getTexture()
        bucket.drawTexture(batch);        
        // for loops, cannot assign to tex. need to dynamically retrieve getTexture()
        // for each droplets, may use TextureObject drop instance created here to call them individually
        for (TextureObject drop : droplets) {
        	drop.drawTexture(batch);
        	drop.setY(drop.getY() - drop.getSpeed());
            if (drop.getY() < 0) {
                drop.setY(400);
                if (drop.getSpeed()<=9) {
                    drop.setSpeed(drop.getSpeed()+2);
                }
            }
        }
        batch.end();
    }
    
    @Override
    public void dispose()
    {
        batch.dispose();
        // dispose each droplets as well
        for (TextureObject drop : droplets) {
            drop.getTexture().dispose();
        }
        bucket.getTexture().dispose();
    }
}