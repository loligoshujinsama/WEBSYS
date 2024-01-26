package com.mygdx.game;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Input.Keys;
import com.badlogic.gdx.graphics.Color;
import com.badlogic.gdx.graphics.Texture;
import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;

public class Entity {
    private float x;
    private float y;
    private float speed;
    
	public float getX() {
		return x;
	}
	public void setX(float x) {
		this.x = x;
	}
	public float getY() {
		return y;
	}
	public void setY(float y) {
		this.y = y;
	}
	public float getSpeed() {
		return speed;
	}
	public void setSpeed(float speed) {
		this.speed = speed;
	}
}

class TextureObject extends Entity {
	private Texture tex;
	
    public TextureObject() {
    	tex = null;
    	setX(0);
    	setY(0);
    	setSpeed(0);
	}
    
    public TextureObject(String texturePath, float x, float y, float speed) {
        this.tex = new Texture(Gdx.files.internal(texturePath));
        setX(x);
        setY(y);
        setSpeed(speed);
    }
    
	public Texture getTexture() {
        return tex;
    }
	
	void drawTexture(SpriteBatch batch) {
        batch.draw(tex, getX(), getY(), tex.getWidth(), tex.getHeight());
    }
}

class Circle extends Entity {
	private float radius;
	
	public Circle(float x, float y, float radius, float speed) {
		super();
		setX(x);
		setY(y);
		this.radius = radius;
		setSpeed(speed);
	}
    public float getRadius() {
        return radius;
    }

    public void setRadius(float radius) {
        this.radius = radius;
    }
    public void drawCircle(ShapeRenderer shape) {
    	shape.setColor(Color.RED);
        shape.circle(getX(), getY(), radius);
    }
    
    public void movement() {
    	//alternatively, can use the bucket movement of 400ups, to move LRUD
    	// && limits boundary within screen. NOTE: 0,0 is bottom-left hence <0
	    float speed = getSpeed();
	    if (Gdx.input.isKeyPressed(Keys.A) && getX() - speed > 0) {
	        setX(getX() - speed);
	    }
	    if (Gdx.input.isKeyPressed(Keys.D) && getX() + speed < Gdx.graphics.getWidth()) {
	        setX(getX() + speed);
	    }
	    if (Gdx.input.isKeyPressed(Keys.W) && getY() + speed < Gdx.graphics.getHeight()) {
	        setY(getY() + speed);
	    }
	    if (Gdx.input.isKeyPressed(Keys.S) && getY() - speed > 0) {
	        setY(getY() - speed);
	    }
	}
}

class Triangle extends Entity {
    private float x1, y1, x2, y2;
    
    public Triangle(float x1, float y1, float length, float speed) {
    	//x and y coordinate of 1st point (x,y)
    	//x1+length and y1+length becomes 2nd point (x2,y2)
    	//(x1+length/2) is the middle, which notes the 3rd x-point
    	//y2: derived by pythagoras' theorem (c^2=a^2+b^2) *trying to find b. c: hypotenuse
    	//square of length, then sqrt(squares) to find the 3rd y-point.
    	//add y1 to make it relative to the 1st point
    	
        super();
        // first point
        setX(x1);
        setY(y1);
        setSpeed(speed);
        // second point
        this.x1 = x1 + length;
        this.y1 = y1;
        // third point
        this.x2 = x1 + length / 2;
        this.y2 = y1 + (float)Math.sqrt(Math.pow(length, 2) - Math.pow(length / 2, 2));
    }
    
    public float getX1() {
        return x1;
    }

    public float getY1() {
        return y1;
    }

    public float getX2() {
        return x2;
    }

    public float getY2() {
        return y2;
    }
    
    public void setX1(float x1) {
    	this.x1 = x1;
    }
    
    public void setX2(float x2) {
    	this.x2 = x2;
    }
    
    public void setY1(float y1) {
    	this.y1 = y1;
    }
    
    public void setY2(float y2) {
    	this.y2 = y2;
    }

    public void drawTriangle(ShapeRenderer shape) {
        shape.setColor(Color.PINK);
        shape.triangle(getX(), getY(), getX1(), getY1(), getX2(), getY2());
    }
    
    public void movement() {
        float screenWidth = Gdx.graphics.getWidth();
        float screenHeight = Gdx.graphics.getHeight();
        float speed = getSpeed();
    	//alternatively, can use the bucket movement of 400ups, to move LRUD
    	// && limits boundary within screen. NOTE: 0,0 is bottom-left hence <0
        if (Gdx.input.isKeyPressed(Keys.J) && getX() - speed > 0 && getX1() - speed > 0 && getX2() - speed > 0) {
            setX(getX() - speed);
            setX1(getX1() - speed);
            setX2(getX2() - speed);
        }
        if (Gdx.input.isKeyPressed(Keys.L) &&
                getX() + speed < screenWidth &&
                getX1() + speed < screenWidth &&
                getX2() + speed < screenWidth) {
            setX(getX() + speed);
            setX1(getX1() + speed);
            setX2(getX2() + speed);
        }
        if (Gdx.input.isKeyPressed(Keys.I) &&
                getY() + speed < screenHeight &&
                getY1() + speed < screenHeight &&
                getY2() + speed < screenHeight) {
            setY(getY() + speed);
            setY1(getY1() + speed);
            setY2(getY2() + speed);
        }
        if (Gdx.input.isKeyPressed(Keys.K) &&
                getY() - speed > 0 &&
                getY1() - speed > 0 &&
                getY2() - speed > 0) {
            setY(getY() - speed);
            setY1(getY1() - speed);
            setY2(getY2() - speed);
        }
    }
    
}
