package com.mygdx.game;

import com.badlogic.gdx.graphics.g2d.SpriteBatch;
import com.badlogic.gdx.graphics.glutils.ShapeRenderer;

import java.util.ArrayList;
import java.util.List;

public class EntityManager {
    private List<Entity> entityList;

    public EntityManager() {
        this.entityList = new ArrayList<>();
    }

    public void addEntity(Entity entity) {
        this.entityList.add(entity);
    }

    public void removeEntity(Entity entity) {
        this.entityList.remove(entity);
    }

    public void drawAllEntities(SpriteBatch batch) {
        for (Entity entity : entityList) {
            if (entity instanceof TextureObject) {
                entity.draw(batch);
            }
        }
    }

    public void drawAllEntities(ShapeRenderer shape) {
        for (Entity entity : entityList) {
            if (entity instanceof Circle || entity instanceof Triangle) {
                entity.draw(shape);
            }
        }
    }

	public void moveAllEntities() {
		for (Entity entity : entityList) {
			if (entity instanceof TextureObject) {
				TextureObject textureObject = (TextureObject) entity;
				if (textureObject.isAIControlled()) {
					textureObject.moveAIControlled();
				} else {
					textureObject.moveUserControlled();
				}
			} else if (entity instanceof Circle || entity instanceof Triangle) {
				entity.moveUserControlled();
			}
		}
	}
}