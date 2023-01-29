class SN():
    def __init__(self, data):
        self.data = data 
        self.nextPointer = None

    def getData(self):
        return self.data

    def setData(self, data):
        self.data = data

    def getNextPointer(self):
        return self.nextPointer

    def setNextPointer(self, nextPointer):
        self.nextPointer = nextPointer
    

class SLL():
    def __init__(self):
        self.head = None
    
    def addNode(self, data):
        if self.head == None:
            self.head = SN(data)

        else:
            next_node = self.head
            while next_node.getNextPointer() != None:
                next_node = next_node.getNextPointer()
            new = SN(data)
            next_node.setNextPointer(new)

    def removeLastNode(self):
        if self.head == None:
            print("No nodes to remove")
        else:
            next_node = self.head
            while next_node.getNextPointer() != None:
                last_node = next_node
                next_node = next_node.getNextPointer()
            last_node.setNextPointer(None)

    def show(self):
        if self.head == None:
            print("None")
        else:
            next_node = self.head
            while next_node.getNextPointer() != None:
                print(next_node.getData())
                next_node = next_node.getNextPointer()
            print(next_node.getData())
            

sll = SLL()
sll.addNode("hello")
sll.addNode("Hi")
sll.addNode("Hey")
sll.show()
print("\n")
sll.removeLastNode()
sll.show()

