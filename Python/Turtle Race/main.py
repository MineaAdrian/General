import random
from turtle import Turtle, Screen


is_race_on = False
screen = Screen()
screen.setup(width=500, height=400)
user_bet = screen.textinput(title="Make your bet", prompt="Which turtle will win the race? Enter a color:")
colors = ["red", "orange", "yellow", "green", "blue", "purple"]
all_turtles = []

start_x = -240
start_y = 125

for color in colors:
    new_turtle = Turtle(shape="turtle")
    new_turtle.color(color)
    new_turtle.penup()
    new_turtle.goto(x=start_x, y=start_y)
    start_y -= 50
    all_turtles.append(new_turtle)

if user_bet:
    is_race_on = True

while is_race_on:
    for turtle in all_turtles:
        if turtle.xcor() > 230:
            is_race_on = False
            wining_color = turtle.pencolor()
            if wining_color == user_bet:
                print(f"You`ve won! The {wining_color} turtle is the winner!")
            else:
                print(f"You`ve lost! The {wining_color} turtle is the winner!")
        forward_range = random.randint(0, 10)
        turtle.forward(forward_range)

screen.exitonclick()