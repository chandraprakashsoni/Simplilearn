// Link to code online - https://onlinegdb.com/HkpTgbO6m

# include <stdio.h> 
# include <stdlib.h> 
# define NO_OF_CHARS 256 
  
// Fills count array with frequency of characters
void fillCharCounts(char *str, int *count) 
{ 
   int i; 
   for (i = 0; *(str+i);  i++) 
      count[*(str+i)]++; 
} 
  
// Print duplicates present in the passed string
void printDups(char *str) 
{ 
  // Create an array of size 256 and fill count of every character in it 
  int *count = (int *)calloc(NO_OF_CHARS, sizeof(int)); 
  // Function to fill count array with frequency
  fillCharCounts(str, count); 
  
  // Print characters having count more than 0 
  int i; 
  for (i = 0; i < NO_OF_CHARS; i++) 
    if(count[i] > 1) 
        printf("%c\n", i); 
  // Deallocating memory
  free(count); 
} 
  
// Driver program to test to pront printDups
int main() 
{ 
    char str[] = "Simplilearn"; 
    
    // Function to find and print duplicates
    printDups(str); 
    return 0; 
} 