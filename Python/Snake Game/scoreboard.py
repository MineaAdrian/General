from turtle import Turtle


class Scoreboard(Turtle):

    def __init__(self):
        super().__init__()
        self.speed("fastest")
        self.pencolor("white")
        self.penup()
        self.goto(0, 270)
        self.pendown()
        self.pensize(10)

    def update_score(self, score):
        self.clear()
        self.write(arg=("Score : " + str(score)), move=False, align="center", font=('Arial', 20, 'normal'))
        self.ht()
