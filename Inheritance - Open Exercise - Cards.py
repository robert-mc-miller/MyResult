class Card():
    def __init__(self, suit, rank):
        self.suit = suit
        self.rank = rank
        
    def get_suit(self):
        return self.suit

    def get_rank(self):
        return self.rank
    
    def get_name(self):
        cards = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"]
        return self.suit + cards[self.rank-1]


class Stack():
    def __init__(self):
        self.cards = []

    def get_cards(self):
        out = self.cards[0].get_name()
        for x in range(len(self.cards)):
            out = out + ", " + self.cards[x].get_name()
        return out

    def get_size(self):
        return len(self.cards)

    def sort(self):
        assignments = True
        
        while assignments == True:
            assignments = False
            
            for i in range(len(self.cards)-1):
                
                if int(str(ord(self.cards[i].get_suit())) + str(self.cards[i].get_rank())) > int(str(ord(self.cards[i+1].get_suit())) + str(self.cards[i+1].get_rank())):
                    
                    temp = self.cards[i]
                    self.cards[i] = self.cards[i+1]
                    self.cards[i+1] = temp
                    assignments = True

        return self.cards
            
    def add(self, Card):
        self.cards = self.cards + [Card]



c1 = Card("H", 1)
c2 = Card("H", 5)
c3 = Card("H", 13)
c4 = Card("D", 7)
c5 = Card("D", 2)
c6 = Card("D", 12)
c7 = Card("C", 2)
c8 = Card("C", 5)
c9 = Card("S", 1)
c10 = Card("S", 5)

s = Stack()
s.add(c1)
s.add(c2)
s.add(c3)
s.add(c4)
s.add(c5)
s.add(c6)
s.add(c7)
s.add(c8)
s.add(c9)
s.add(c10)

print(s.get_cards())
s.sort()
print(s.get_cards())