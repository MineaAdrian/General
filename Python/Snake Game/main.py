import time

from snake import Snake
from turtle import Screen
from food import Food
from scoreboard import Scoreboard

screen = Screen()
screen.setup(width=600, height=600)
screen.bgcolor("black")
screen.title("My Snake Game")
screen.tracer(0)

snake = Snake()
food = Food()
scoreboard = Scoreboard()

screen.listen()
screen.onkey(snake.up, "Up")
screen.onkey(snake.down, "Down")
screen.onkey(snake.right, "Right")
screen.onkey(snake.left, "Left")

game_is_on = True
while game_is_on:
    screen.update()
    time.sleep(0.1)
    snake.move()
    scoreboard.update_score()

    # Detect if the snake collides with the food
    if snake.head.distance(food) < 15:
        food.refresh()
        snake.add_segment()
        scoreboard.increase_score()

    # Detect if the snake collides with margin
    if snake.head.xcor() > 290 or snake.head.xcor() < - 290 or snake.head.ycor() > 290 or snake.head.ycor() < - 290:
        scoreboard.reset()
        snake.reset()

    # Detect if the snake collides with its own body
    if snake.check_collision():
        scoreboard.reset()
        snake.reset()

screen.exitonclick()
