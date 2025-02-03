import random
import time
from turtle import Screen
from player import Player
from car_manager import CarManager
from scoreboard import Scoreboard

screen = Screen()
screen.setup(width=600, height=600)
screen.tracer(0)
player = Player()
scoreboard = Scoreboard()

screen.listen()
screen.onkey(player.move_up, "Up")
cars = []
COUNTER = 0
LEVEL = 1
TIME = 0.1

game_is_on = True
while game_is_on:
    time.sleep(TIME)
    screen.update()
    COUNTER += 1

    if COUNTER > random.randint(6, 12):
        for _ in range(random.randint(0, 3)):
            new_car = CarManager()
            cars.append(new_car)
            COUNTER = 0

    for car in cars:
        car.move()
        if player.distance(car) < 22:
            game_is_on = False
            scoreboard.you_lost()

    if player.check_finish_line():
        player.restart()
        LEVEL += 1
        scoreboard.update_score(level=LEVEL)
        TIME *= 0.9

screen.exitonclick()
