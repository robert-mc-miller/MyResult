class Polygon():
    def __init__(self):
        self.numsides = 0
        self.category = ""
        self.name = "Polygon"

    def introduce(self):
        print("I am just a " + self.name)


class Quadrilateral(Polygon):
    def __init__(self):
        self.numsides = 4
        self.category = "Polygon"
        self.name = "Quadrilateral"

    def introduce(self):
        print("I am just a " + self.name + "(a type of " + self.category + ")")


class Rectangle(Quadrilateral):
    def __init__(self, length, height):
        self.sides = 4
        self.name = "Rectangle"
        self.category = "Quadrilateral"
        self.length = length
        self.height = height

    def get_perimeter(self):
        return self.height * 2 + self.length * 2

    def get_area(self):
        return self.height * self.length
    
    def introduce(self):
        print("I am just a " + self.name + "(a type of " + self.category + ")")
        a = self.get_area()
        p = self.get_perimeter()
        print("I have an area of " + str(a) + ".")
        print("I have a perimeter of " + str(p) + ".")




poly = Polygon()
quad = Quadrilateral()
rec = Rectangle(5, 8)

poly.introduce()
quad.introduce()
rec.introduce()
print(rec.get_area())
print(rec.get_perimeter())