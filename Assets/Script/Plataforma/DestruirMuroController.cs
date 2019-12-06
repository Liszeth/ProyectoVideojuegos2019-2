using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class DestruirMuroController : MonoBehaviour
{
    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    void OnTriggerEnter2D(Collider2D colision)
    {
        if (colision.tag == "espada_personaje")
        {
            Destroy(gameObject);
        }
        if (colision.tag == "bala")
        {
            Destroy(gameObject);
            Destroy(colision.gameObject);
        }
    }
}
