from tkinter import *
from tkinter import messagebox
from passwordGenerator import *
import pyperclip


# ---------------------------- PASSWORD GENERATOR ------------------------------- #

def generate():
    generated_password = password_generator()
    password_entry.delete(0, 'end')
    password_entry.insert(0, generated_password)
    pyperclip.copy(generated_password)


# ---------------------------- SAVE PASSWORD ------------------------------- #

def save():
    line_to_save = website_entry.get() + " | " + username_entry.get() + " | " + password_entry.get()
    if website_entry.get() == "" or username_entry.get() == "" or password_entry.get() == "":
        messagebox.showinfo(title="Ooops:",
                            message=f"Please don`t leave any fields empty!")
    else:
        is_ok = messagebox.askokcancel(title="These are the details entered:",
                                       message=f"{line_to_save} \nShould we add them?")
        if is_ok:
            with open("save.txt", "a") as data_file:
                data_file.write(line_to_save + "\n")
            website_entry.delete(0, 'end')
            password_entry.delete(0, 'end')


# ---------------------------- UI SETUP ------------------------------- #
window = Tk()
window.title("Password Manager")
window.config(padx=50, pady=50)

canvas = Canvas(width=200, height=200)
lock_image = PhotoImage(file="logo.png")
canvas.create_image(100, 100, image=lock_image)
canvas.grid(column=1, row=0)

# Labels
website_name_label = Label(text="Website:", padx=5)
website_name_label.grid(column=0, row=1)
username_label = Label(text="Email/Username:", pady=5)
username_label.grid(column=0, row=2)
password_label = Label(text="Password:", pady=3)
password_label.grid(column=0, row=3)

# Entry
website_entry = Entry(width=52)
website_entry.grid(column=1, row=1, columnspan=2)
website_entry.focus()
username_entry = Entry(width=52)
username_entry.grid(column=1, row=2, columnspan=2)
username_entry.insert(0, "mineaad14@gmail.com")
password_entry = Entry(width=34)
password_entry.grid(column=1, row=3)

# Buttons
generate_password_button = Button(text="Generate Password", width=14, command=generate)
generate_password_button.grid(column=2, row=3)
add_button = Button(text="Add", width=44, command=save)
add_button.grid(column=1, row=4, columnspan=2)

window.mainloop()
