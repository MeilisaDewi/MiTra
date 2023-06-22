#include <stdio.h>

int faktorial(int n) {
    if (n == 0) {
        return 1;
    }
    return n * faktorial(n-1);
}

int main() {
    int nilai, hasil;
    printf("Masukkan nilai: ");
    scanf("%d", &nilai);
    hasil = faktorial(nilai);
    printf("%d! = ", nilai);
    for (int i = 1; i < nilai; i++) {
        printf("%d x", i);
    }
    printf(" %d -> Hasil Faktorialnya\n",nilai);
    printf("%d",hasil);
    return 0;
}