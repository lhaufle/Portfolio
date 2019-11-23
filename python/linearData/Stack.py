from test import Node


'''
The Stack class makes use of the node
to create a stack data structure
'''
class Stack:

    def __init__(self, value = None):
        self.head_node = Node(value)

    #allows for a view of what is at the top of the stack
    def peak(self):
        print(str(self.head_node.get_value()))

    #Push node to the top of the stack
    def push(self, val):
        new_node = Node(val)
        new_node.set_next_node(self.head_node)
        self.head_node = new_node

    #Pop node from the top of the stack
    def pop(self):
        item = self.head_node.get_value()
        self.head_node = self.head_node.get_next_node();
        return  item

    '''
    The show method adds the nodes to a list, 
    which will be returned so that the stack can be examined
    '''
    def show(self):
        current_node = self.head_node
        items = []
        while current_node != None:
            items.append((current_node.get_value()))
            current_node = current_node.get_next_node()
        return items


test = Stack('hello')

test.peak()
