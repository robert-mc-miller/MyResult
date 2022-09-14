class Animal():
    def __init__(self, age, sex):
        self.age = age
        self.sex = sex

    def get_age(self):
        return self.age

    def get_sex(self):
        return self.sex

    def reproduce(self):
        print("I'm continuing my species")


class Duck(Animal):
    ##Not best practice to rewrite constructor
    def __init__(self, age, sex, beakCol):
        self.age = age
        self.sex = sex
        self.beakCol = beakCol

    def get_breakCol(self):
        return self.beakCol

    def talk(self):
        print("quack!")

    def swim(self):
        print("I'm swimming away now")

class Fish(Animal):
    def __init__(self, age, sex, massInG):
        super().__init__(age, sex)
        self.massInG = massInG

    def get_massInG(self):
        return self.massInG

    def swim(self):
        print("Blob blob blob")

class Zebra(Animal):
    
    def run(self):
        print("I'm running clip clop")


z = Zebra(5, "M")
z.run()
print(z.get_age())
d = Duck(2, "F", "Yellow")
f = Fish(2, "M", 10)
d.swim()
f.swim()

print(isinstance(z, Zebra))
print(isinstance(z, Animal))
print(isinstance(z, Fish))