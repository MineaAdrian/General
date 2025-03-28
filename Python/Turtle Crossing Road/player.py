from turtle import Turtle

STARTING_POSITION = (0, -280)
MOVE_DISTANCE = 10
FINISH_LINE_Y = 280


class Player(Turtle):
    def __init__(self):
        super().__init__()
        self.penup()
        self.shape("turtle")
        self.setheading(90)
        self.goto(STARTING_POSITION)

    def move_up(self):
        self.sety(self.ycor() + MOVE_DISTANCE)

    def check_finish_line(self):
        if self.ycor() == FINISH_LINE_Y:
            return True
        return False

    def restart(self):
        self.goto(STARTING_POSITION)
