import random
n=random.randint(1,10)
print('I am thinking of a number between 1 to 10')
running=True
while running:
    guess=int(input('take a guess '))
    if guess==n:
        print('Well done !')
        running = False
    elif guess< n :
        print('try a bigger one !')
    else :
        print('try a smaller one!')
