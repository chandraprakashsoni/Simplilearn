// Link to code online - https://onlinegdb.com/ByDmbZupm

#include <iostream>
using namespace std; 
  
// Function to find common element between 2 arrays
void common(int a[], int b[], int n, int m) 
{ 
    int i = 0, j = 0; 
      
    while (i < n && j < m)  
    { 
                  
        if (a[i] > b[j])  
        { 
            j++; 
        }  
                  
        else if (b[j] > a[i])  
        { 
            i++; 
        }  
        else 
        { 
            // when both are equal 
            cout << a[i] << " "; 
            i++; 
            j++; 
        } 
    } 
} 
  
// Driver Code 
int main() 
{ 
    // Input sorted Arrays
    int a[] = {1, 2, 3, 3, 4, 5, 5, 6}; 
    int b[] = {1, 3, 3, 5};
    
    // Finding size of both arrays  
    int n = sizeof(a)/sizeof(a[0]); 
    int m = sizeof(b)/sizeof(b[0]);
    
    // Calling function to find common
    common(a, b, n, m); 
} 