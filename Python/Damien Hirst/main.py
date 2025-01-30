import turtle as turtle_module
import random
from turtle import Turtle, Screen
import colorgram

turtle_module.colormode(255)
tim = Turtle()
tim.shape("turtle")

x = -400
y = -400
#
# colors = colorgram.extract('photo.jpg', 30)
# rgb_colors =[]
#
# for color in colors:
#     r = color.rgb.rs
#     g = color.rgb.g
#     b = color.rgb.b
#     new_color = (r, g, b)
#     rgb_colors.append(new_color)

color_list = [(247, 241, 234), (249, 228, 236), (224, 242, 230), (243, 236, 68), (183, 75, 21), (228, 154, 7),
              (234, 72, 134), (200, 163, 114), (216, 228, 238), (202, 131, 191), (116, 168, 241), (220, 231, 5),
              (76, 173, 37), (71, 103, 230), (125, 205, 126), (45, 111, 39), (75, 37, 30), (151, 74, 156),
              (60, 100, 153), (241, 162, 196), (244, 55, 28), (187, 28, 12), (203, 13, 78), (140, 216, 237),
              (248, 170, 166), (76, 67, 47), (148, 185, 244), (159, 212, 173), (253, 10, 4), (42, 90, 32)]

tim.penup()
for row in range(9):
    y += 80
    tim.teleport(x, y)
    for _ in range(9):
        tim.forward(80)
        tim.dot(30, random.choice(color_list))

tim.hideturtle()
screen = Screen()
screen.exitonclick()