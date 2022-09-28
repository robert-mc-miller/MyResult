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

                if float(ord(self.cards[i].get_suit()) + (self.cards[i].get_rank())/13) > float(ord(self.cards[i+1].get_suit()) + ((self.cards[i+1].get_rank())/13)):
                    
                    temp = self.cards[i]          
                    self.cards[i] = self.cards[i+1]
                    self.cards[i+1] = temp
                    assignments = True

        return self.cards
            
    def add(self, Card):
        self.cards = self.cards + [Card]

    def cardSearch(self, target):
        target = ord(target[0]) + int(target[1:])/13 
        cards_bak = self.cards
        self.sort()
        s = 0
        e = len(self.cards)
        position = 0
        found = False
        while found == False and s <= e:
            m = int((s+e)/2) 
            if target == (self.cards[m].get_rank()/13)+(ord(self.cards[m].get_suit())):
                position = m
                found = True
            elif target < (self.cards[m].get_rank()/13)+(ord(self.cards[m].get_suit())):
                e = m - 1
            else:
                s = m + 1

        if found == False:
            print("Not found")
        else:
            print("The card has been found in the Stack")

        self.cards = cards_bak
        

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


card1 = Card("D", 6)
card2 = Card("D", 9)
card3 = Card("H", 3)
card4 = Card("C", 11)
card5 = Card("C", 9)
card6 = Card("D", 8)
card7 = Card("H", 2)
card8 = Card("D", 12)
card9 = Card("C", 6)
card10 = Card("H", 13)

s18 = Stack()
s18.add(card1) 
s18.add(card2) 
s18.add(card3) 
s18.add(card4)
s18.add(card5) 
s18.add(card6) 
s18.add(card7) 
s18.add(card8) 
s18.add(card9) 
s18.add(card10)

s18.cardSearch("C11")
s18.cardSearch("D9")
s18.cardSearch("H3")
s18.cardSearch("H2")
s18.cardSearch("C12")
s18.cardSearch("C6")
s18.cardSearch("C11")

 