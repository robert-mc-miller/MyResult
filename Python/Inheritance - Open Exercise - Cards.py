from hashlib import sha3_224
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
        self.cards = [""] * 52
        suits = ["C", "D", "H", "S"]
        index =  0
        for i in range(4):
            for x in range(1, 14):
                self.cards[index] = Card(suits[i], x)
                index += 1

    def shuffle(self):
        for i in range(len(self.cards)):
            temp = self.cards[i]
            randnum = random.randint(0,51)
            self.cards[i] = self.cards[randnum]
            self.cards[randnum] = temp

    def deal(self, stackList, num):
        if len(stackList) * num > 52:
            print("There is not enough cards in a deck to deal that many to each stack.")
            return

        self.shuffle()
        temp = self.cards
        cardsDealt = 0
        for x in range(len(stackList)):
            for i in range(num):
                stackList[x].add(self.cards[cardsDealt]) 
                cardsDealt += 1


class Hand(Stack):
    def __init__(self, name):
        self.playerName = name
        self.cards = []

    def get_player_name(self):
        return self.playerName

    def add(self, card):
        self.cards = self.cards + [card]
        if len(self.cards) > 1:
            self.sort()

class Hand_OM(Hand):
    def sort(self):
        assignments = True
        
        while assignments == True:
            assignments = False
            
            for i in range(len(self.cards)-1):

                if float(ord(self.cards[i].get_suit())/100 + (self.cards[i].get_rank())) > float(ord(self.cards[i+1].get_suit())/100 + ((self.cards[i+1].get_rank()))):
                    
                    temp = self.cards[i]          
                    self.cards[i] = self.cards[i+1]
                    self.cards[i+1] = temp
                    assignments = True

        return self.cards

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

d = Deck()


s1 = Stack()
s2 = Stack()
s3 = Stack()
s4 = Stack()
s5 = Stack()
stackList = [s1, s2, s3, s4, s5]

d.deal(stackList, 10)

h = Hand("Jack")
h.add(c1)
h.add(c2)
h.add(c3)
h.add(c4)

print(h.get_cards())
print(h.get_player_name())

h_om  = Hand_OM("James")
h_om.add(c4)
h_om.add(c1)
h_om.add(c2)
h_om.add(c3)
h_om.add(c5)
h_om.add(Card("S", 1))
h_om.add(Card("S", 1))
h_om.add(Card("S", 2))

print(h_om.get_cards())

 