n = int(input()) #số hs
k = int(input()) # số đề
p = int(input()) #Hàng
q = int(input()) #Vị trí trong hàng
def IntToLoc(Int):
    q=Int%2
    if(q==0):
        return (Int-2)//2+1,2
    else:
        return (Int-1)//2+1,1
def locToInt(p,q):
    return (p-1)*2 + q
def cout(_tuple):
    p,q=_tuple
    print(p,q)
# Alice vị trí
Loc_A = locToInt(p,q)
if(Loc_A<=k):
    if(Loc_A+k>n):
        print(-1)
    else:
        cout(IntToLoc(Loc_A+k))
else:
    cout(IntToLoc(Loc_A-k))
