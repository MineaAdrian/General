import turtle
import pandas
import time

screen = turtle.Screen()
screen.title("U.S. States Game")
image = "blank_states_img.gif"
screen.addshape(image)
turtle.shape(image)
screen.tracer(0)
screen.setup(height=500, width=700)
counter = 0

data = pandas.read_csv("50_states.csv")
guessed_states = []
states_to_learn = []
keep_guessing = True

while keep_guessing:
    answer_state = (screen.textinput(title=f"{counter}/50 States Correct", prompt="What`s another state`s name?"))
    if answer_state.lower() == "exit":
        all_states = data.to_dict()
        counter = 0
        for state in range(0, 50):
            if all_states["state"][state] in guessed_states:
                pass
            else:
                states_to_learn.append(all_states["state"][state])

        output = pandas.DataFrame({"Index": range(1, len(states_to_learn) + 1), "State": states_to_learn})
        output.to_csv("states_to_learn.csv", index=False)
        break

    get_coord = data[data.state.str.strip().str.lower() == answer_state.strip().lower()]
    if not get_coord.empty:
        if get_coord.state.item() in guessed_states:
            pass
        else:
            x, y = int(get_coord.x.iloc[0]), int(get_coord.y.iloc[0])
            turtle.penup()
            turtle.teleport(x, y)
            turtle.pendown()
            turtle.write(get_coord.state.item(), align="center", font=("Arial", 12, "normal"))
            turtle.teleport(0, 0)
            screen.update()
            time.sleep(0.1)
            guessed_states.append(get_coord.state.item())
            counter += 1
            if counter == 50:
                keep_guessing = False
                print("You won!")
    else:
        print("State not found. Try again.")
