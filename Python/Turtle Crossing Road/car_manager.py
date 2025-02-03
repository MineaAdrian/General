from turtle import Turtle
import random

COLORS = ["red", "orange", "yellow", "green", "blue", "purple"]
STARTING_MOVE_DISTANCE = 5
MOVE_INCREMENT = 10


class CarManager(Turtle):
    def __init__(self):
        super().__init__()
        self.penup()
        self.shape("square")
        self.color(random.choice(COLORS))
        self.setheading(90)
        self.shapesize(stretch_wid=2, stretch_len=1)
        self.goto(280, random.randint(-230, 230))

    def move(self):
        self.setx(self.xcor() - STARTING_MOVE_DISTANCE)
