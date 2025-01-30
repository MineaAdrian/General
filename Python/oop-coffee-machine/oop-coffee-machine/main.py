from menu import Menu, MenuItem
from coffee_maker import CoffeeMaker
from money_machine import MoneyMachine

coffee_maker = CoffeeMaker()
menu = Menu()
money_machine = MoneyMachine()


machine_on = True
print(r"""   
   _____       __  __       __  __            _     _            
  / ____|     / _|/ _|     |  \/  |          | |   (_)           
 | |     ___ | |_| |_ ___  | \  / | __ _  ___| |__  _ _ __   ___ 
 | |    / _ \|  _|  _/ _ \ | |\/| |/ _` |/ __| '_ \| | '_ \ / _ \
 | |___| (_) | | | ||  __/ | |  | | (_| | (__| | | | | | | |  __/
  \_____\___/|_| |_| \___| |_|  |_|\__,_|\___|_| |_|_|_| |_|\___|
                                                                 """)

while machine_on:
    order = input("What would you like? (espresso/latte/cappuccino) \n").lower()
    if order == "report":
        coffee_maker.report()
        money_machine.report()
    elif order == "off":
        print("The machine is off!")
        machine_on = False
    elif order == "espresso" or order == "latte" or order == "cappuccino":
        order_requirements = menu.find_drink(order)
        if coffee_maker.is_resource_sufficient(order_requirements):
            if money_machine.make_payment(order_requirements.cost):
                coffee_maker.make_coffee(order_requirements)
    else:
        print("This is not a valid input!")

