from turtle import Turtle

ALIGNMENT = "center"
FONT = ("Courier", 20, "normal")


class Scoreboard(Turtle):

    def __init__(self):
        super().__init__()
        self.ht()
        self.penup()
        self.speed("fastest")
        self.pencolor("white")
        self.pensize(10)
        self.goto(0, 270)

    def update_score(self, l_paddle_score, r_paddle_score):
        self.clear()
        self.write(arg=(str(l_paddle_score) + " : " + str(r_paddle_score)), move=False, align=ALIGNMENT, font=FONT)
        self.ht()
