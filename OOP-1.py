from datetime import date

class Person():
    def __init__(self, name, dob, country):
        self.name = name
        self.dob = dob
        self.country = country
        
    def getName(self):
        return self.name

    def getDoB(self):
        return self.dob[8:10] + '/' + self.dob[5:7] + '/' + self.dob[:4]

    def getCoB(self):
        return self.country

    def setName(self, newName):
        self.name = newName

    def getAge(self):
        today = date.today()
        birthYear = self.dob[0:4]
        return today.year - int(birthYear)
    
    def getDoBtext(self):
      months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
      return self.dob[8:10] + ' ' + months[int(self.dob[5:7])] + ' ' + self.dob[:4]

class Club():
    def __init__(self, name):
        self.name = name
        self.members = []

    def getName(self):
        return self.name

    def setName(self, name):
        self.name = name

    def addMember(self, person):
        self.members.append(person)

    def getMembers(self):
        names = [''] * len(self.members)
        for x in range(len(self.members)):
            print(x)
            names[x] = self.members[x].name
        
        out = [''] * len(self.members)
        for x in range(len(self.members)):
            first = names[0]
            for i in range(1, len(self.members)):
                if self.sortAlphabet(first, names[i], 0) == names[i]:
                    first = names[i]
                    location = i
            out[x] = first
            names[location] = "ZZZ"
            for w in range(x+1):
              names[location] += "ZZZ"
        return out



    def getNumPeople(self):
        return len(self.members)

    def isMember(self, name):
      for x in range(len(self.members)):
        if self.members[x].name == name:
          return True
      return False

    def sortAlphabet(self, word1, word2, start):
        print(word1 + word2)
        if ord(word1[start].lower()) < ord(word2[start].lower()):
            print("winner", word1)
            return word1
        elif ord(word1[start].lower()) > ord(word2[start].lower()):
            print("winner", word2)
            return word2
        else:
            return self.sortAlphabet(word1, word2, start+1)


p1 = Person("Mary", "1970/01/01", "England")
p2 = Person("Poppins","1980/02/29","Scotland")
p3 = Person("Humpty","1990/01/03","Wales")
p4 = Person("AAA", "2000/02/01", "Ireland")

c1 = Club("Science")
c2 = Club("Book")

c1.addMember(p1)
c1.addMember(p2)
c1.addMember(p4)
c2.addMember(p2)
c2.addMember(p3)


print(p1.getName())
p1.setName("Marjorie")
print(p1.getName())
print(p2.getDoB())
print(p2.getAge())
print(p3.getAge())

print(c1.getMembers())

print("There are " + str(c1.getNumPeople()) + " people in the " + c1.getName() + " club")

print(c1.isMember("Poppins"))
print(c1.isMember("James"))






























while(1):
    pass