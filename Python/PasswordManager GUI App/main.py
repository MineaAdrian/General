import json
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
    if website_entry.get() == "" or username_entry.get() == "" or password_entry.get() == "":
        messagebox.showinfo(title="Ooops:",
                            message=f"Please don`t leave any fields empty!")
    else:
        new_data = {website_entry.get(): {
            "email": username_entry.get(),
            "password": password_entry.get()
        }}
        try:
            with open("data.json", "r") as data_file:
                # json.dump(new_data, data_file, indent=4)
                data = json.load(data_file)

        except FileNotFoundError:
            with open("data.json", "w") as data_file:
                json.dump(new_data, data_file, indent=4)
        else:
            data.update(new_data)

            with open("data.json", "w") as data_file:
                json.dump(data, data_file, indent=4)
        finally:
            website_entry.delete(0, 'end')
            password_entry.delete(0, 'end')


# ---------------------------- SEARCH PASSWORD ------------------------------- #

def find_password():
    website = website_entry.get()
    try:
        with open("data.json", "r") as data_file:
            # json.dump(new_data, data_file, indent=4)
            data = json.load(data_file)
    except FileNotFoundError:
        messagebox.showinfo(title="Error:",
                            message=f"No Data File Found.")
    else:
        if website in data:
            messagebox.showinfo(title=f"{website}:",
                                message=f"Email: {data[website]["email"]}\n"
                                        f"Password: {data[website]["password"]}")
            pyperclip.copy(data[website]["password"])
        else:
            messagebox.showinfo(title="Error:",
                                message=f"Credentials not found for {website}.")
    finally:
        website_entry.delete(0, 'end')


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
website_entry = Entry(width=34)
website_entry.grid(column=1, row=1)
website_entry.focus()
username_entry = Entry(width=52)
username_entry.grid(column=1, row=2, columnspan=2)
username_entry.insert(0, "mineaad14@gmail.com")
password_entry = Entry(width=34)
password_entry.grid(column=1, row=3)

# Buttons
search_button = Button(text="Search", width=14, command=find_password)
search_button.grid(column=2, row=1)
generate_password_button = Button(text="Generate Password", width=14, command=generate)
generate_password_button.grid(column=2, row=3)
add_button = Button(text="Add", width=44, command=save)
add_button.grid(column=1, row=4, columnspan=2)

window.mainloop()
