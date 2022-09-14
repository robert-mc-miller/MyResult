import random

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
        for x in range(1, len(self.cards)):
            out = out + ", " + self.cards[x].get_name()
        return out

    def get_size(self):
        return len(self.cards)

    def sort(self):
        assignments = True
        
        while assignments == True:
            assignments = False
            
            for i in range(len(self.cards)-1):

                if float(ord(self.cards[i].get_suit()) + (self.cards[i].get_rank())/13) > float(ord(self.cards[i+1].get_suit()) + ((self.cards[i+1].get_rank())/10)):
                    
                    temp = self.cards[i]          
                    self.cards[i] = self.cards[i+1]
                    self.cards[i+1] = temp
                    assignments = True

        return self.cards
            
    def add(self, Card):
        self.cards = self.cards + [Card]


class Deck(Stack):
    def __init__(self):
        self.cards = ["H1","H2","H3","H4","H5","H6","H7","H8","H9","H10","H11","H12","H13","D1","D2","D3","D4","D5","D6","D7","D8","D9","D10","D11","D12","D13","S1","S2","S3","S4","S5","S6","S7","S8","S9","S10","S11","S12","S13","C1","C2","C3","C4","C5","C6","C7","C8","C9","C10","C11","C12","C13"]

    def shuffle(self):
        for i in range(len(self.cards)):
            temp = self.cards[i]
            randnum = random.randint(0,52)
            self.cards[i] = self.cards[randnum]
            self.cards[randnum] = temp


c1 = Card("H", 2)
c2 = Card("D", 3)
c3 = Card("C", 1)
c4 = Card("D", 13)
c5 = Card("D", 1)

s = Stack()
s.add(c1)
s.add(c2)
s.add(c3)
s.add(c4)
s.add(c5)


print(s.get_cards())
s.sort()
print(s.get_cards())
