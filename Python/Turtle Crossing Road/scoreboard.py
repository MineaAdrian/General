from turtle import Turtle

FONT = ("Courier", 24, "normal")


class Scoreboard(Turtle):
    def __init__(self):
        super().__init__()
        self.ht()
        self.penup()
        self.speed("fastest")
        self.pencolor("black")
        self.pensize(10)
        self.goto(-210, 250)
        self.level = 1
        self.write(arg=("Level : " + str(self.level)), move=False, align="center", font=FONT)

    def update_score(self, level):
        self.level = level
        self.clear()
        self.write(arg=("Level : " + str(self.level)), move=False, align="center", font=FONT)

    def you_lost(self):
        self.goto(0, 0)
        self.write(arg="Game Over!", move=False, align="center", font=FONT)
