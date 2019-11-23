'''
The Node class is used as the foundation 
of the data structures
'''

class Node:
    #the constructor takes a value and pointer
    def __init__(self, value, next_node = None):
        self.value = value
        self.next_node = next_node

    #returns the value of the node
    def get_value(self):
        return self.value

    #returns the next node if it exists
    def get_next_node(self):
        return self.next_node

    #set the pointer
    def set_next_node(self, next_node):
        self.next_node = next_node

