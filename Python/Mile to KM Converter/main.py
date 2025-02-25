import tkinter
from tkinter import Entry

calculation = 0


def button_clicked():
    if input.get() == "":
        kilometer_result_label.config(text=0)
    elif input.get().isnumeric():
        kilometer_result_label.config(text=round(int(input.get()) * 1.60934, 2))


window = tkinter.Tk()
window.title("My first GUI program")
window.minsize(width=300, height=150)
window.config(padx=50, pady=50)

# Label
miles_label = tkinter.Label(text="Miles")
miles_label.grid(column=2, row=0)
miles_label.config(padx=5, pady=5)

# Label
kilometer_label = tkinter.Label(text="Km")
kilometer_label.grid(column=2, row=1)
kilometer_label.config(padx=5, pady=5)


# Label
is_equal_label = tkinter.Label(text="is equal to ")
is_equal_label.grid(column=0, row=1)
is_equal_label.config(padx=5, pady=5)

# Label
kilometer_result_label = tkinter.Label(text="0")
kilometer_result_label.grid(column=1, row=1)
kilometer_result_label.config(padx=5, pady=5)

# Button
calculate_button = tkinter.Button(text="Calculate", command=button_clicked)
calculate_button.grid(column=1, row=2)
calculate_button.config(padx=5, pady=5)

# Entry
input = Entry(width=10)
input.grid(column=1, row=0)

window.mainloop()
