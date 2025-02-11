from turtle import Turtle

with open("data.txt") as file:
    high_score = int(file.read())

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
        self.score = 0
        self.high_score = high_score
        self.ht()

    def increase_score(self):
        self.score += 1

    def update_score(self):
        self.clear()
        self.write(arg=f"Score : {self.score} High Score: {self.high_score}", align=ALIGNMENT, font=FONT)

    def reset(self):
        global high_score
        if self.score > self.high_score:
            self.high_score = self.score
            with open("data.txt", mode="w") as data:
                data.write(str(self.high_score))
        self.score = 0
        self.update_score()

    # def set_game_over(self):
    #     self.goto(0, 0)
    #     self.write(arg="Game Over.", move=False, align=ALIGNMENT, font=FONT)
    #     self.ht()
