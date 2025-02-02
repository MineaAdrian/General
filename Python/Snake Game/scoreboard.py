from turtle import Turtle

ALIGNMENT = "center"
FONT = ("Courier", 20, "normal")


class Scoreboard(Turtle):

    def __init__(self):
        super().__init__()
        self.penup()
        self.speed("fastest")
        self.pencolor("white")
        self.pensize(10)
        self.goto(0, 270)

    def update_score(self, score):
        self.clear()
        self.write(arg=("Score : " + str(score)), move=False, align=ALIGNMENT, font=FONT)
        self.ht()

    def set_game_over(self):
        self.goto(0, 0)
        self.write(arg="Game Over.", move=False, align=ALIGNMENT, font=FONT)
        self.ht()
