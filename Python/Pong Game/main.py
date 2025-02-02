from turtle import Screen
from paddle import Paddle
from scoreboard import Scoreboard
from ball import Ball
import time

scoreboard = Scoreboard()

R_PADDLE_SCORE = 0
L_PADDLE_SCORE = 0
BALL_SPEED = 0.1

screen = Screen()
screen.setup(width=800, height=600)
screen.bgcolor("black")
screen.title("Pong")
screen.tracer(0)

r_paddle = Paddle(350, 0)
l_paddle = Paddle(-350, 0)
ball = Ball()

screen.listen()
screen.onkey(r_paddle.move_up, "Up")
screen.onkey(r_paddle.move_down, "Down")
screen.onkey(l_paddle.move_up, "w")
screen.onkey(l_paddle.move_down, "s")

game_is_on = True

while game_is_on:
    screen.update()
    time.sleep(BALL_SPEED)
    ball.move_ball()

    if ball.ycor() > 290 or ball.ycor() < -290:
        ball.bounce_y()

    if ball.xcor() > 320 and r_paddle.distance(ball) < 50 and ball.x_move > 0:
        ball.bounce_x()
        BALL_SPEED *= 0.9
    elif ball.xcor() < -320 and l_paddle.distance(ball) < 50 and ball.x_move < 0:
        ball.bounce_x()
        BALL_SPEED *= 0.9

    if ball.xcor() > 360:
        L_PADDLE_SCORE += 1
        ball.reset_position()
        BALL_SPEED = 0.1

    if ball.xcor() < -360:
        R_PADDLE_SCORE += 1
        ball.reset_position()
        BALL_SPEED = 0.1

    scoreboard.update_score(L_PADDLE_SCORE, R_PADDLE_SCORE)

screen.exitonclick()
